import { Logger, NotFoundException } from '@nestjs/common';
import {
  FilterQuery,
  Model,
  Types,
  UpdateQuery,
  SaveOptions,
  Connection,
  ProjectionType,
  QueryOptions,
} from 'mongoose';
import {} from '@nestjs/mongoose';
import { AbstractDocument } from './abstract.schema';

export abstract class AbstractRepository<TDocument extends AbstractDocument> {
  protected abstract readonly logger: Logger;

  constructor(
    protected readonly model: Model<TDocument>,
    private readonly connection: Connection,
  ) {}

  async create(
    document: Omit<TDocument, '_id'>,
    options?: SaveOptions,
  ): Promise<TDocument> {
    const createDocument = new this.model({
      ...document,
      _id: new Types.ObjectId(),
    });

    return (
      await createDocument.save(options)
    ).toJSON() as unknown as TDocument;
  }

  async findOne(
    filterQuery: FilterQuery<TDocument>,
    projections: ProjectionType<TDocument> = {},
    findOneOptions: QueryOptions<TDocument> = { lean: true },
  ): Promise<TDocument> {
    const document = await this.model.findOne<TDocument>(
      filterQuery,
      projections,
      findOneOptions,
    );

    if (!document) {
      this.logger.warn(`Document not found with filterQuery:`, filterQuery);
      throw new NotFoundException('Document not found.');
    }

    return document;
  }

  async findOneAndUpdate(
    filterQuery: FilterQuery<TDocument>,
    updateQuery: UpdateQuery<TDocument>,
    options: QueryOptions<TDocument> = { lean: true, new: true },
  ): Promise<TDocument> {
    const document = await this.model.findOneAndUpdate(
      filterQuery,
      updateQuery,
      options,
    );

    if (!document) {
      this.logger.warn(`Document not found with filterQuery:`, filterQuery);
      throw new NotFoundException('Document not found.');
    }

    return document;
  }

  async upsert(
    filterQuery: FilterQuery<TDocument>,
    document: Partial<TDocument>,
    options: QueryOptions = {
      lean: true,
      new: true,
      upsert: true,
    },
  ): Promise<TDocument> {
    return await this.model.findOneAndUpdate(filterQuery, document, options);
  }

  async find(
    filterQuery: FilterQuery<TDocument>,
    projections: ProjectionType<TDocument>,
    options: QueryOptions = { lean: true },
  ): Promise<TDocument[]> {
    return await this.model.find(filterQuery, projections, options);
  }

  async startTransaction() {
    const session = await this.connection.startSession();
    session.startTransaction();

    return session;
  }
}
