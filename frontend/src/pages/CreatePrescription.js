import React, { useState } from 'react';
import api from '../api/axios';

export default function CreatePrescription() {
  const [appointmentId, setAppointmentId] = useState('');
  const [medication, setMedication] = useState('');
  const [dosage, setDosage] = useState('');

  const handleSubmit = async e => {
    e.preventDefault();
    try {
      const res = await api.post('/prescriptions', {
        appointment_id: appointmentId,
        medication,
        dosage,
      });
      alert('Prescription créée !');
      console.log(res.data);
    } catch (err) {
      alert('Erreur lors de la création');
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Créer une prescription</h2>
      <input type="number" placeholder="ID du rendez-vous" value={appointmentId} onChange={e => setAppointmentId(e.target.value)} />
      <input type="text" placeholder="Médicament" value={medication} onChange={e => setMedication(e.target.value)} />
      <input type="text" placeholder="Dosage" value={dosage} onChange={e => setDosage(e.target.value)} />
      <button type="submit">Envoyer</button>
    </form>
  );
}
