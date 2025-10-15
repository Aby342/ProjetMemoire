import React, { useState } from 'react';
import api from '../api/axios';

export default function Register() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');
  const [role, setRole] = useState('patient');
  const [error, setError] = useState('');

  const handleRegister = async e => {
    e.preventDefault();
    setError('');
    try {
      const res = await api.post('/register', {
        name,
        email,
        password,
        password_confirmation: passwordConfirmation,
        role,
      });
      localStorage.setItem('token', res.data.token);
      window.location.href = '/home';
    } catch (err) {
      setError(err.response?.data?.message || 'Erreur lors de l’inscription');
    }
  };

  return (
    <form onSubmit={handleRegister}>
      <h2>Inscription</h2>
      {error && <p style={{ color: 'red' }}>{error}</p>}
      <input
        type="text"
        placeholder="Nom"
        value={name}
        onChange={e => setName(e.target.value)}
        required
      />
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
      <input
        type="password"
        placeholder="Confirmer le mot de passe"
        value={passwordConfirmation}
        onChange={e => setPasswordConfirmation(e.target.value)}
        required
      />
      <select value={role} onChange={e => setRole(e.target.value)}>
        <option value="patient">Patient</option>
        <option value="doctor">Docteur</option>
        <option value="admin">Admin</option>
      </select>
      <button type="submit">S’inscrire</button>
    </form>
  );
}
