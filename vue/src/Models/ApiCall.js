import axios from "axios";
const baseURL = import.meta.env.VITE_API_BASE_URL;
const secretKey = import.meta.env.VITE_SECRET_KEY;
const headers = {
    'Access-Control-Allow-Origin': '*',
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${secretKey}`,
    'Notion-Version': '2022-02-22'
};

function changeHeaderAttribute( key, value ) {
    headers[key] = value;
}

async function sendPost( url, data = {} ) {
    console.log('headers', headers);
    return await axios.post( `${baseURL}${url}`, data, {headers: headers} );  
}

async function sendGet( url ) {
    return await axios.get( `${baseURL}${url}`, {headers: headers} );
}

export {sendPost, sendGet, changeHeaderAttribute}