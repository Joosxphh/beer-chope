import React, { useState } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import App from "./page/Home/Home.jsx";
import ProductShow from "./page/ProductShow/ProductShow.jsx";
import Login from "./page/Login/Login.jsx";
import ForgotPassword from "./page/ForgotPassword/ForgotPassword.jsx";

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
        <Route
          path="/login"
          element={
            <Login darkMode={darkMode} toggleDarkMode={toggleDarkMode} />
          }
        />
        <Route
          path="/login/forgot-password"
          element={
            <ForgotPassword
              darkMode={darkMode}
              toggleDarkMode={toggleDarkMode}
            />
          }
        />
      </Routes>
    </Router>
  );
};

export default AppRouter;
