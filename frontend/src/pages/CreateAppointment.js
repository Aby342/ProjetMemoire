import React, { useState } from 'react';
import api from '../api/axios';

export default function CreateAppointment() {
  const [doctorId, setDoctorId] = useState('');
  const [date, setDate] = useState('');
  const [time, setTime] = useState('');

  const handleSubmit = async e => {
    e.preventDefault();
    try {
      const res = await api.post('/appointments', {
        doctor_id: doctorId,
        date,
        time,
      });
      alert('Rendez-vous créé !');
      console.log(res.data);
    } catch (err) {
      alert('Erreur lors de la création');
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Créer un rendez-vous</h2>
      <input type="number" placeholder="ID du docteur" value={doctorId} onChange={e => setDoctorId(e.target.value)} />
      <input type="date" value={date} onChange={e => setDate(e.target.value)} />
      <input type="time" value={time} onChange={e => setTime(e.target.value)} />
      <button type="submit">Envoyer</button>
    </form>
  );
}
