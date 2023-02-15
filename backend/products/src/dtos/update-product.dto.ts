import { ApiProperty } from '@nestjs/swagger';
import { IsOptional, IsString, IsNumber } from 'class-validator';

export class UpdateProductDto {
  @ApiProperty()
  @IsString()
  @IsOptional()
  public name: string;

  @ApiProperty()
  @IsNumber({}, { each: true })
  @IsOptional()
  public categoriesId: number[];

  @ApiProperty()
  @IsNumber()
  @IsOptional()
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
