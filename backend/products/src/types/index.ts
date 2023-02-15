export interface GetResponse<T> {
  count: number;
  data: T[];
}

export interface ProductQuerryFilter {
  name: string;
  price_range: {
    min: number;
    max: number;
    equal: number;
  };
  categories: number[];
  sizes: string[];
  colors: string[];
  descriptions: string[];
}
