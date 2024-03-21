import React, { useState } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import App from "./page/Home/Home.jsx";
import ProductShow from "./page/ProductShow/ProductShow.jsx";

const AppRouter = () => {
  const [darkMode, setDarkMode] = useState(false);

  const toggleDarkMode = () => setDarkMode(!darkMode);

  return (
    <Router>
      <Routes>
        <Route
          path="/"
          element={<App darkMode={darkMode} toggleDarkMode={toggleDarkMode} />}
        />
        <Route
          path="/product/:id"
          element={
            <ProductShow darkMode={darkMode} toggleDarkMode={toggleDarkMode} />
          }
        />
      </Routes>
    </Router>
  );
};

export default AppRouter;
