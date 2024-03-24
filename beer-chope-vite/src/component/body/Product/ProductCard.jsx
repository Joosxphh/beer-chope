import {
  Card,
  CardHeader,
  CardBody,
  CardFooter,
  Typography,
  Button,
} from "@material-tailwind/react";

import { Link } from "react-router-dom";
import { toast, ToastContainer } from "react-toastify";

const ProductCard = ({ name, price, description, image, id, isAuth }) => {
  return (
    <Card
      style={{ minHeight: "320px", height: "content", width: "260px" }}
      className="m-4"
    >
      <CardHeader shadow={false} floated={false} className="h-24">
        <img
          src={image}
          alt="card-image"
          className="h-full w-full object-cover"
        />
      </CardHeader>
      <CardBody>
        <div className="mb-2 flex items-center justify-between">
          <Typography color="blue-gray" className="font-medium">
            {name}
          </Typography>
          <Typography color="blue-gray" className="font-medium">
            {`$${price}.00`}
          </Typography>
        </div>
        <Typography
          variant="small"
          color="gray"
          className="font-normal opacity-75"
        >
          {description}
        </Typography>
      </CardBody>
      <CardFooter className="pt-0 flex flex-col justify-arround ">
        <Link to={`/product/${id}`}>
          <Button
            ripple={false}
            fullWidth={true}
            className="bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100 mb-2"
          >
            En savoire plus
          </Button>
        </Link>
        {isAuth && (
          <Button
            className="mb-2"
            onClick={() =>
              toast.success("Le produit à bien était ajouter au panier")
            }
          >
            Ajouter au panier
          </Button>
        )}
      </CardFooter>
      <ToastContainer />
    </Card>
  );
};

export default ProductCard;
