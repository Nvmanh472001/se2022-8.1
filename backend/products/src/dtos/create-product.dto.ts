import { ApiProperty } from '@nestjs/swagger';
import { IsNotEmpty, IsOptional, IsString, IsNumber } from 'class-validator';

export class CreateProductDto {
  @ApiProperty()
  @IsString()
  @IsNotEmpty({ message: 'Product name is required' })
  public name: string;

  @ApiProperty()
  @IsNumber()
  @IsNotEmpty({ message: 'Category id is require' })
  public categoriesId: number[];

  @ApiProperty()
  @IsNumber({}, { each: true })
  @IsNotEmpty({ message: 'Quantity is required' })
  public quantity: number;

  @ApiProperty()
  @IsNumber()
  @IsOptional()
  public price: number;

  @ApiProperty()
  @IsOptional()
  @IsString({ each: true })
  public filesId: string[];

  @ApiProperty()
  @IsString()
  @IsOptional()
  public descriptions: string;

  @ApiProperty()
  @IsString({ each: true })
  @IsOptional()
  public colors: string[];

  @ApiProperty()
  @IsString({ each: true })
  @IsOptional()
  public sizes: string[];
}
