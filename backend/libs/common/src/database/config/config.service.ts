import { Injectable } from '@nestjs/common';
import { ConfigService } from '@nestjs/config';

@Injectable()
export class MongoDBConfigService {
  constructor(private readonly configService: ConfigService) {}

  get host(): string {
    return this.configService.get<string>('mongodb.host');
  }

  get port(): number {
    return Number(this.configService.get<number>('mongodb.port'));
  }

  get username(): string {
    return this.configService.get<string>('mongodb.username');
  }

  get password(): string {
    return this.configService.get<string>('mongodb.password');
  }

  get db(): string {
    return this.configService.get<string>('mongodb.db');
  }

  get uri(): string {
    return ``;
  }
}
