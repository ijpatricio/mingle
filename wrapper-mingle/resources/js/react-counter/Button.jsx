import React from 'react'

const Button = ({ label, onClick }) => {
    return (
        <button
            className='rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50'
            onClick={onClick}
        >
            {label}
        </button>
    );
}

export default Button

