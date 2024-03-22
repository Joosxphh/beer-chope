import { useEffect, useState } from "react";
import { getUser } from "../services";

const useLogin = () => {
  const [authUser, setAuthUser] = useState(null);

  useEffect(() => {
    const fetchUser = async () => {
      const res = await getUser();
      if (res.error) return setAuthUser(null);
      setAuthUser(res);
    };
    fetchUser();
  }, []);

  const logout = () => {
    localStorage.removeItem("token");
    setAuthUser({});
  };

  return { authUser, logout };
};

export default useLogin;
