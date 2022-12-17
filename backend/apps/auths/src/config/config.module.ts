import * as Joi from '@hapi/joi';
import { Module } from '@nestjs/common';
import { ConfigService, ConfigModule } from '@nestjs/config';
import configuration from './configuration';
import { JwtConfigService } from './config.service';

@Module({
  imports: [
    ConfigModule.forRoot({
      load: [configuration],
      validationOptions: Joi.object({
        JWT_SECRET_KEY: Joi.string().required(),
      }),
    }),
  ],
  providers: [ConfigService, JwtConfigService],
  exports: [ConfigService, JwtConfigService],
})
export class JwtConfigModule {}
