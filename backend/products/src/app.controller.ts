import {
  Controller,
  Get,
  Param,
  Put,
  Query,
  Body,
  Post,
  UseGuards,
} from '@nestjs/common';
import { AppService } from './app.service';
import { CreateProductDto, UpdateProductDto } from './dtos';
import { JwtAuthGuard, RolesGuard } from './guards';
import { ProductQuerryFilter } from './types';

@UseGuards(JwtAuthGuard)
@Controller()
export class AppController {
  constructor(private readonly appService: AppService) {}

  @Get()
  getAllProducts(@Query() data: { page: number; limit: number }) {
    return this.appService.getAllProducts(data);
  }

  @Get()
  getAllProductByFiltter(
    @Query()
    data: {
      page: number;
      limit: number;
      filterQuerry: ProductQuerryFilter;
    },
  ) {
    return this.appService.getAllProductByFilter(data);
  }

  @Get(':id')
  getProductById(@Param() param: { id: string }) {
    return this.appService.getProductById(Number(param.id));
  }

  @UseGuards(RolesGuard)
  @Put(':id')
  updateProducts(@Param() param: { id: string }, data: UpdateProductDto) {
    return this.appService.updateProduct(Number(param.id), data);
  }

  @UseGuards(RolesGuard)
  @Post()
  createProduct(@Body() data: CreateProductDto) {
    return this.appService.createNewProduct(data);
  }
}
