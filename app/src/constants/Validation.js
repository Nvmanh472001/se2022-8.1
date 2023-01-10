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

