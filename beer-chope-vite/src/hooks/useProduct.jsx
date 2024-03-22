import React, { useEffect } from "react";
import { getProducts } from "../services";

const useProduct = () => {
  const [products, setProducts] = React.useState([]);
  const [isLoading, setIsLoading] = React.useState(true);
  const [immuableProducts, setImmuableProducts] = React.useState([]);
  const [categories, setCategories] = React.useState([]);
  const [selectedCategory, setSelectedCategory] = React.useState("");
  const lengthForSkeleton = 10;
  const skeletons = Array.from(
    { length: lengthForSkeleton },
    (_, index) => index
  );

  useEffect(() => {
    const fetchProducts = async () => {
      const products = await getProducts();
      if (products?.data.length > 0) {
        const categories = products?.data?.map((product) =>
          product.categories.map((category) => category.name).join(" ")
        );
        setCategories([...new Set(categories)]);
      }
      setImmuableProducts(products);
      setProducts(products);
      setIsLoading(false);
    };
    fetchProducts();
  }, []);

  const filterProducts = (category) => {
    const filteredProducts = immuableProducts?.data?.filter((product) =>
      product.categories.map((category) => category.name).includes(category)
    );
    if (filterProducts.length > 0) {
      setProducts({ data: filteredProducts });
      setSelectedCategory(category);
    }
  };

  const resetCategorySelected = () => {
    setProducts(immuableProducts);
    setSelectedCategory("");
  };

  return {
    products,
    isLoading,
    skeletons,
    categories,
    selectedCategory,
    filterProducts,
    resetCategorySelected,
  };
};

export default useProduct;
