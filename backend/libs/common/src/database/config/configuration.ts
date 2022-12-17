import { registerAs } from '@nestjs/config';

export default registerAs('mongodb', () => ({
  host: process.env.MONGODB_HOST,
  port: process.env.MONGODB_PORT,
  username: process.env.MONGODN_USERNAME,
  password: process.env.MONGODB_PASSWORD,
  db: process.env.MONGODB_DB,
}));
