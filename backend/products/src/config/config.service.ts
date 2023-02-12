import { Injectable } from '@nestjs/common';
import { config } from 'dotenv';
config();

interface Config {
  servicePort: string;
  rb_url: string;
  auth_queue: string;
  product_queue: string;
  mailer_queue: string;
  file_queue: string;
  env: string;
}

@Injectable()
export class ConfigService {
  private config = {} as Config;

  constructor() {
    this.config.servicePort = process.env.PORT;
    this.config.rb_url = process.env.RABBITMQ_URL;
    this.config.auth_queue = process.env.RABBITMQ_AUTH_QUEUE;
    this.config.product_queue = process.env.RABBITMQ_PRODUCT_QUEUE;
    this.config.mailer_queue = process.env.RABBITMQ_MAILER_QUEUE;
    this.config.file_queue = process.env.RABBITMQ_FILE_QUEUE;
    this.config.env = process.env.NODE_ENV;
  }

  public get(key: keyof Config): any {
    return this.config[key];
  }
}
