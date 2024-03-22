import Skeleton from "react-loading-skeleton";
import "react-loading-skeleton/dist/skeleton.css";

const ProductLoading = () => {
  return (
    <div
      className="bg-gray-100 dark:bg-gray-800 flex-grow m-2 mr-0 shadow rounded-l flex flex-wrap"
      style={{ width: "55vw", height: "85vh" }}
    >
      <div className="rounded-lg shadow-lg overflow-hidden">
        <div className="md:flex">
          <div
            className="p-8 flex flex-col justify-between"
            style={{ height: "85vh" }}
          >
            <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
              <Skeleton width={850} height={100} />
              <h1 className="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                <Skeleton width={850} height={50} count={2} />
              </h1>
            </div>

            <p className="mt-2 text-gray-500">
              <Skeleton width={850} height={15} count={8} />
            </p>

            <div>
              <div className="mt-4">
                <Skeleton width={850} height={20} count={2} />
              </div>
              <div className="mt-4">
                <Skeleton width={850} height={25} count={1} />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProductLoading;
