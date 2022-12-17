import { registerAs } from '@nestjs/config';

export default registerAs('jwt', () => ({
  secret_key: process.env.JWT_SECRET_KEY,
}));
