import "./Home.css";

import { CategoryProduct } from "../../component/body";
import { SkeletonTheme } from "react-loading-skeleton";

const Home = ({ darkMode }) => {
  return (
    <SkeletonTheme baseColor="#D3D3D3" highlightColor="#fff">
      <div className={`${darkMode && "dark"} m-0`}>
        <CategoryProduct />
      </div>
    </SkeletonTheme>
  );
};

export default Home;
