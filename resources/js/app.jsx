import React from 'react';
import './bootstrap';
import { createRoot } from 'react-dom/client';
import Properties from './view/front/Properties';

const root = createRoot(document.getElementById('app'));
root.render(<Properties />);