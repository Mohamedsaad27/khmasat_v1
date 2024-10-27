import React from 'react';
import './bootstrap';
import { createRoot } from 'react-dom/client';
import Properties from './view/front/Properties';
import Properties from 'https://khmasat.treasure-academy.com/resources/js/view/front/Properties.jsx';

const root = createRoot(document.getElementById('app'));
root.render(<Properties />);