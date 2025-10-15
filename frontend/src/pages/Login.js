import React, { useState } from 'react';
import api from '../api/axios';

export default function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleLogin = async e => {
    e.preventDefault();
    setError('');

    try {
      const res = await api.post('/login', { email, password });
      localStorage.setItem('token', res.data.token);
      localStorage.setItem('role', res.data.user.role); 

      window.location.href = '/home';
    } catch (err) {
      if (err.response) {
        setError(err.response.data.message || 'Identifiants incorrects');
      } else {
        setError('Erreur de connexion au serveur');
      }
    }
  };

  return (
    <form onSubmit={handleLogin}>
      <h2>Connexion</h2>
      {error && <p style={{ color: 'red' }}>{error}</p>}
      <input
        type="email"
        placeholder="Email"
        value={email}
        onChange={e => setEmail(e.target.value)}
        required
      />
      <input
        type="password"
        placeholder="Mot de passe"
        value={password}
        onChange={e => setPassword(e.target.value)}
        required
      />
      <button type="submit">Se connecter</button>
      <p>
        Pas encore inscrit ? <a href="/register">Créer un compte</a>
      </p>
    </form>
  );
}
