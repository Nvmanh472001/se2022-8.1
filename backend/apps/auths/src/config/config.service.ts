import { Injectable } from '@nestjs/common';
import { ConfigService } from '@nestjs/config';

@Injectable()
export class JwtConfigService {
  constructor(private readonly configService: ConfigService) {}

  get jwt_serect_key(): string {
    return this.configService.get<string>('jwt.serect_key');
  }
}
