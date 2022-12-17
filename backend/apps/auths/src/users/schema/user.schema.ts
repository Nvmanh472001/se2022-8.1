import { Prop, Schema, SchemaFactory } from '@nestjs/mongoose';
import { Exclude } from 'class-transformer';
import { AbstractDocument } from '@common/database/abstract.schema';

@Schema({ versionKey: false })
export class User extends AbstractDocument {
  @Prop({ unique: true })
  email: string;

  @Prop({ unique: true })
  username: string;

  @Prop()
  @Exclude()
  password: string;

  @Prop({ unique: true })
  phone: number;

  @Prop()
  avatarPhoto: string;

  @Prop()
  address: string;
}

export const UserSchema = SchemaFactory.createForClass(User);
