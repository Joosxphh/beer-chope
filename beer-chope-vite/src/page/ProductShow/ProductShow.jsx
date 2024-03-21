import React, { useEffect } from "react";
import { useParams } from "react-router-dom";

import { Nav } from "../../component/header";
import {
  ImageProductLeft,
  ProductDescription,
  ProductLoading,
} from "../../component/body";

import { getOneProduct } from "../../services";

const ProductShow = ({ darkMode, toggleDarkMode }) => {
  const [product, setProduct] = React.useState({});
  const [isLoading, setIsLoading] = React.useState(true);
  const { id } = useParams();
  useEffect(() => {
    if (id) {
      const fetchProduct = async () => {
        const data = await getOneProduct(id);
        setProduct(data);
        setIsLoading(false);
      };
      fetchProduct();
    }
  }, [id]);

  return (
    <div className={darkMode ? "dark" : ""}>
      <Nav toggleDarkMode={toggleDarkMode} />
      <div className="flex flex-row">
        <ImageProductLeft />
        {isLoading ? <ProductLoading /> : <ProductDescription {...product} />}
      </div>
    </div>
  );
};

export default ProductShow;
