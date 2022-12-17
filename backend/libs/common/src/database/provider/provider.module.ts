import { Module } from '@nestjs/common';
import { MongooseModule, MongooseModuleAsyncOptions } from '@nestjs/mongoose';
import { MongoDBConfigModule } from '../config/config.module';
import { MongoDBConfigService } from '../config/config.service';

@Module({
  imports: [
    MongooseModule.forRootAsync({
      imports: [MongoDBConfigModule],
      connectionName: 'commonDB',
      useFactory: async (config: MongoDBConfigService) => ({
        uri: config.uri,
        useNewUrlParser: true,
        useUnifiedTopology: true,
        useFindAndModify: true,
      }),
      inject: [MongoDBConfigService],
    } as MongooseModuleAsyncOptions),
  ],
})
export class MongoDBProviderModule {}
