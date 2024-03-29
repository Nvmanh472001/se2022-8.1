import { ApiProperty } from '@nestjs/swagger';
import { IsEnum, IsNotEmpty, IsString } from 'class-validator';

enum FileModuleType {
  user_profile = 'Profile',
  product_image = 'Product',
}

export class GetPresignDto {
  @ApiProperty()
  @IsString()
  @IsNotEmpty({ message: 'name is required.' })
  name: string;

  @ApiProperty()
  @IsEnum(FileModuleType, {
    message: '[Profile, Product] type is required',
  })
  @IsNotEmpty({ message: 'type is required.' })
  type: FileModuleType;
}
