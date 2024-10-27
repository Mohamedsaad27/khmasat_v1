import { useState, useEffect } from "react";

const Properties = (currentPage, filter) => {
    const [properties, setProperties] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    if (!filter) {
        useEffect(() => {
            const fetchProperties = async () => {
                try {
                    const currentUrl = window.location.href;
                    const url = new URL(currentUrl);
                    const searchParams = url.searchParams;

                    let apiUrl;
                    if (searchParams.toString()) {
                        apiUrl = `/api/properties/search?${searchParams.toString()}`;
                    } else {
                        apiUrl = `/api/properties?page=${currentPage}`;
                    }

                    const response = await fetch(apiUrl);
                    if (!response.ok)
                        throw new Error("Failed to fetch properties");

                    const data = await response.json();
                    setProperties(data);
                    console.log("Fetched properties:", data); // Added console log
                } catch (err) {
                    setError(err.message);
                    console.error("Error fetching properties:", err); // Added console log
                } finally {
                    setLoading(false);
                }
            };

            fetchProperties();
        }, [currentPage]);
    } else if (filter) {
        useEffect(() => {
            const fetchFilter = async () => {
                try {
                    const filterParams = new URLSearchParams();
                    Object.keys(filter).forEach((key) => {
                        if (filter[key]) {
                            filterParams.append(key, filter[key]);
                        }
                    });

                    const url = `/api/filter${
                        currentPage ? `?page=${currentPage}&` : "?"
                    }${filterParams.toString()}`;
                    const response = await fetch(url);
                    if (!response.ok)
                        throw new Error("Failed to fetch properties");

                    const data = await response.json();
                    setProperties(data);
                    console.log("Fetched filtered properties:", data, filter); // Added console log

                    // when search again and search is done set error null
                    setError(null);
                } catch (err) {
                    setError(err.message);
                    console.error("Error fetching filtered properties:", err); // Added console log
                } finally {
                    setLoading(false);
                }
            };
            fetchFilter();
        }, [currentPage, filter]);
    }

    // Return an object containing loading, error, and properties data
    return { loading, error, data: properties };
};

export default Properties;
