import React from "react";
import { Card, CardBody, CardFooter } from "@material-tailwind/react";
import { Link } from "react-router-dom";

import Skeleton from "react-loading-skeleton";
import "react-loading-skeleton/dist/skeleton.css";

const ProductSkeleton = () => {
  return (
    <Card style={{ height: "300px", width: "260px" }} className="m-4">
      <CardBody>
        <Skeleton width={220} height={45} />
        <div className="mb-2 flex items-center justify-between">
          <Skeleton width={220} height={20} />
        </div>
        <Skeleton width={220} height={15} count={3} />
      </CardBody>
      <CardFooter className="pt-0">
        <Link to="/product">
          <Skeleton width={220} height={40} />
        </Link>
      </CardFooter>
    </Card>
  );
};

export default ProductSkeleton;
