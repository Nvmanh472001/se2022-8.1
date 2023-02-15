import { HttpException, HttpStatus, Inject, Injectable } from '@nestjs/common';
import { ClientProxy } from '@nestjs/microservices';
import { Product } from '@prisma/client';
import { filter } from 'rxjs';
import { CreateProductDto, UpdateProductDto } from './dtos';
import { PrismaService } from './services';
import { GetResponse, ProductQuerryFilter } from './types';

@Injectable()
export class AppService {
  constructor(
    @Inject('AUTH_SERVICE') private readonly authClient: ClientProxy,
    private prismaService: PrismaService,
  ) {
    this.authClient.connect();
  }

  public async getAllProducts(data: {
    page: number;
    limit: number;
  }): Promise<GetResponse<Product>> {
    let { limit, page } = data;

    if (!page || page === 0) {
      page = 1;
    }

    if (!limit) {
      limit = 10;
    }

    const skip = (page - 1) * limit;
    const count = await this.prismaService.product.count();

    const response = await this.prismaService.product.findMany({
      skip: skip,
      take: limit,
    });

    return {
      count,
      data: response,
    };
  }

  public async getAllProductByFilter(data: {
    page: number;
    limit: number;
    filterQuerry: ProductQuerryFilter;
  }): Promise<GetResponse<Product>> {
    const { filterQuerry } = data;

    let { page, limit } = data;
    if (!page || page === 0) {
      page = 1;
    }

    if (!limit) {
      limit = 10;
    }

    const skip = (page - 1) * limit;
    const count = await this.prismaService.product.count({
      where: {
        OR: [
          {
            name: {
              contains: filterQuerry.name,
              mode: 'insensitive',
            },
          },
          {
            price: {
              equals: filterQuerry.price_range.equal,
              gte: filterQuerry.price_range.max,
              lte: filterQuerry.price_range.min,
            },
          },
          {
            categories: {
              some: {
                id: {
                  in: filterQuerry.categories,
                },
              },
            },
          },
          {
            sizes: {
              hasSome: filterQuerry.sizes,
            },
          },
          {
            colors: {
              hasSome: filterQuerry.colors,
            },
          },
        ],
      },
    });

    const response = await this.prismaService.product.findMany({
      where: {
        OR: [
          {
            name: {
              contains: filterQuerry.name,
              mode: 'insensitive',
            },
          },
          {
            price: {
              equals: filterQuerry.price_range.equal,
              gte: filterQuerry.price_range.max,
              lte: filterQuerry.price_range.min,
            },
          },
          {
            categories: {
              some: {
                id: {
                  in: filterQuerry.categories,
                },
              },
            },
          },
          {
            sizes: {
              hasSome: filterQuerry.sizes,
            },
          },
          {
            colors: {
              hasSome: filterQuerry.colors,
            },
          },
        ],
      },
      skip: skip,
      take: limit,
    });

    return {
      count,
      data: response,
    };
  }
  public async getProductById(id: number): Promise<Product> {
    return this.prismaService.product.findUnique({
      where: {
        id,
      },
    });
  }

  public async createNewProduct(data: CreateProductDto): Promise<Product> {
    try {
      const product = {} as Product;
      const catogeries = data.categoriesId.map((categoryId) => ({
        id: categoryId,
      }));

      product.name = data.name;
      product.price = data.price;
      product.descriptions = data.descriptions;
      product.quantity = data.quantity;
      product.images = data.filesId;
      product.colors = data.colors;
      product.sizes = data.sizes;

      const create_product = await this.prismaService.product.create({
        data: {
          ...product,
          categories: {
            connect: catogeries,
          },
        },
        include: {
          categories: true,
        },
      });

      return create_product;
    } catch (e) {
      throw e;
    }
  }

  public async updateProduct(
    id: number,
    data: UpdateProductDto,
  ): Promise<Product> {
    try {
      const findProduct = await this.prismaService.product.findUnique({
        where: { id },
      });

      if (!findProduct) {
        throw new HttpException('Product not found!', HttpStatus.NOT_FOUND);
      }

      const product = await this.prismaService.product.update({
        where: { id },
        data: data,
      });

      return product;
    } catch (e) {
      throw e;
    }
  }
}
