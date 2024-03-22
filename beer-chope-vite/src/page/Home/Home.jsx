import "./Home.css";
import { Nav } from "../../component/header";
import { CategoryProduct } from "../../component/body";
import { SkeletonTheme } from "react-loading-skeleton";

const Home = ({ darkMode, toggleDarkMode }) => {
  return (
    <SkeletonTheme baseColor="#888888" highlightColor="#fff">
      <div className={`${darkMode && "dark"} m-0`}>
        <Nav toggleDarkMode={toggleDarkMode} />
        <CategoryProduct />
      </div>
    </SkeletonTheme>
  );
};

export default Home;
