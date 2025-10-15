import React, { useState, useEffect } from 'react';
import Dashboard from './Dashboard';
import CreateAppointment from './CreateAppointment';
import CreatePrescription from './CreatePrescription';
import AdminDashboard from './AdminDashboard';

export default function Home() {
  const [section, setSection] = useState('dashboard');
  const role = localStorage.getItem('role');

  useEffect(() => {
    if (!localStorage.getItem('token')) {
      window.location.href = '/';
    }
  }, []);

  return (
    <div style={{ display: 'flex', height: '100vh' }}>
      {/* Sidebar */}
      <div style={{ width: '200px', background: '#f0f0f0', padding: '20px' }}>
        <h3>Menu</h3>
        <button onClick={() => setSection('dashboard')}>Dashboard</button>
        {role === 'patient' && (
          <button onClick={() => setSection('appointment')}>Rendez-vous</button>
        )}
        {role === 'doctor' && (
          <button onClick={() => setSection('prescription')}>Prescription</button>
        )}
        {role === 'admin' && (
          <button onClick={() => setSection('admin')}>Admin</button>
        )}
        <button
          onClick={() => {
            localStorage.clear();
            window.location.href = '/';
          }}
        >
          Déconnexion
        </button>
      </div>

      {/* Main content */}
      <div style={{ flex: 1, padding: '20px' }}>
        {section === 'dashboard' && <Dashboard />}
        {section === 'appointment' && <CreateAppointment />}
        {section === 'prescription' && <CreatePrescription />}
        {section === 'admin' && <AdminDashboard />}
      </div>
    </div>
  );
}
