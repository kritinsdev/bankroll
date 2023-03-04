import '../scss/main.scss';
//TODO : import on board layout
import '@splidejs/splide/css';
import { MobileMenu } from './MobileMenu';
import { BoardLoadMore } from './BoardLoadMore';
import { Carousel } from './Carousel';
import {Filters} from './Filters';

new MobileMenu();
new BoardLoadMore();
new Carousel();
new Filters();