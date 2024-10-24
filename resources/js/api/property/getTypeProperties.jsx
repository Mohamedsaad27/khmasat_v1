import { useState, useEffect } from 'react';

const TypesProperty = () => {
    const [types, setTypes] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchTypes = async () => {
            try {
                const response = await fetch('/api/types-property');
                if (!response.ok) throw new Error('Failed to fetch types');

                const data = await response.json();
                setTypes(data);
            } catch (err) {
                setError(err.message);
            } finally {
                setLoading(false);
            }
        };

        fetchTypes();
    }, []);

    // Return an object containing loading, error, and types
    return { loading, error, data: types };
};

export default TypesProperty;
