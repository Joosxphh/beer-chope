import CategoryLeftPan from "./CategoryLeftPan";
import ProductList from "../Product/ProductList";
import useProduct from "../../../hooks/useProduct";

const CategoryProduct = ({ authUser }) => {
  const {
    products,
    skeletons,
    isLoading,
    categories,
    selectedCategory,
    filterProducts,
    resetCategorySelected,
  } = useProduct();

  return (
    <div className="flex flex-row">
      <CategoryLeftPan
        isLoading={isLoading}
        categories={categories}
        filterProducts={filterProducts}
      />
      <ProductList
        products={products}
        skeletons={skeletons}
        isLoading={isLoading}
        selectedCategory={selectedCategory}
        resetCategorySelected={resetCategorySelected}
        isAuth={!!authUser}
      />
    </div>
  );
};

export default CategoryProduct;
