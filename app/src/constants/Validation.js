import { yupResolver } from '@hookform/resolvers/yup';
import * as Yup from 'yup';

const validationLogin = Yup.object().shape({
    username: Yup.string()
        .required('Username is required'),
    password: Yup.string()
        .required('Password is required')
        .min(6, 'Password must be at least 6 characters'),
});

export const loginOptions = { resolver: yupResolver(validationLogin) };

const validationEmail = Yup.object().shape({
    email: Yup.string()
        .required('Email is required')
        .email('Must be valid email'),
});

export const emailOptions = { resolver: yupResolver(validationEmail) };