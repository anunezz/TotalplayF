import {RouterView} from './RouterView.js';
import nexmun from "../components/views/nexmun/Index";
import residencial from "../components/views/residencial/Index";
import netflix from '../components/views/netflix/Index';
import amazon from '../components/views/amazon/Index';
import term from "../components/views/terms/Index";

export default {
    path: '',
    component: RouterView,
    children: [
        {
            path: '/',
            component: nexmun,
            name: 'NextMunComponent',
        },
        {
            path: '/residencial',
            component: residencial,
            name: 'ResidencialComponent',
        },
        {
            path: '/netflix',
            component: netflix,
            name: 'NetflixComponent',
        },
        {
            path: '/amazon-prime',
            component: amazon,
            name: 'AmazonComponent',
        },
        {
            path: '/terminos-y-condiciones',
            component: term,
            name: 'TotalplayTermComponent',
        },
    ],
}
