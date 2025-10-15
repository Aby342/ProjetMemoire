import React, { useEffect, useState } from 'react';
import api from '../api/axios';

export default function Dashboard() {
  const [user, setUser] = useState(null);

  useEffect(() => {
    api.get('/user')
      .then(res => setUser(res.data))
      .catch(() => window.location.href = '/');
  }, []);

  return (
    <div>
      <h2>Bienvenue {user?.name}</h2>
      <p>Rôle : {user?.role}</p>
    </div>
  );
}
