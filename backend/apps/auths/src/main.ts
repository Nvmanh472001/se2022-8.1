import { NestFactory } from '@nestjs/core';
import { AuthsModule } from './auths.module';

async function bootstrap() {
  const app = await NestFactory.create(AuthsModule);
  await app.listen(3000);
}
bootstrap();
