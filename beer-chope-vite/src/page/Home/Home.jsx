import "./Home.css";

import { CategoryProduct } from "../../component/body";
import { SkeletonTheme } from "react-loading-skeleton";

const Home = ({ darkMode, authUser }) => {
  return (
    <SkeletonTheme baseColor="#D3D3D3" highlightColor="#fff">
      <div className={`${darkMode && "dark"} m-0`}>
        <CategoryProduct authUser={authUser} />
      </div>
    </SkeletonTheme>
  );
};

export default Home;
