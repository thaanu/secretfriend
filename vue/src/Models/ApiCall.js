import axios from "axios";
const baseURL = import.meta.env.VITE_API_BASE_URL;
const apiKey = import.meta.env.VITE_API_KEY;
const headers = {
    'Content-Type': 'application/json',
    'Authorization': apiKey
};

function changeHeaderAttribute( key, value ) {
    headers[key] = value;
}

async function sendPost( url, data = {} ) {
    return await axios.post( `${baseURL}${url}`, data, {headers: headers} );
}

async function sendGet( url ) {
    return await axios.get( `${baseURL}${url}`, {headers: headers} );
}

export {sendPost, sendGet, changeHeaderAttribute}