import CategoryLeftPan from "./CategoryLeftPan";
import ProductList from "./ProductList";

const CategoryProduct = () => {
  return (
    <div className="flex flex-row">
      <CategoryLeftPan />
      <ProductList />
    </div>
  );
};

export default CategoryProduct;
