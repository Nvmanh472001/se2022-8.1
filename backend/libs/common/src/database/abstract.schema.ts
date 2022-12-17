import { Prop, Schema } from '@nestjs/mongoose';
import { SchemaTypes, Types } from 'mongoose';
import { Transform } from 'class-transformer';

@Schema()
export class AbstractDocument {
  @Prop({ type: SchemaTypes.ObjectId })
  @Transform(({ value }) => value.toString())
  _id: Types.ObjectId;
}
