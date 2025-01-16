import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import VerdurasIndex from './components/Verduras/Index';

const container = document.getElementById('app');
const root = createRoot(container);
root.render(<VerdurasIndex />);
