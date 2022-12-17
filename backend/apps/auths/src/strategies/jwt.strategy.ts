import { Injectable, UnauthorizedException } from '@nestjs/common';
import { JwtConfigService } from '../config/config.service';
import { PassportStrategy } from '@nestjs/passport';
import { ExtractJwt, Strategy } from 'passport-jwt';
import { Types } from 'mongoose';
