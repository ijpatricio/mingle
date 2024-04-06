import React, {useState, useEffect} from 'react'

function HelloWorld({wire, ...props}) {

    const [category, setCategory] = useState('')

    useEffect(() => {
        wire.getRandomCategory().then((data) => {
            setCategory(data)
        })
    }, [])

    const message = props.mingleData.message

    return (
            <div className="my-10 bg-lime-300 rounded-xl p-4 text-2xl text-center">
                <div className="text-indigo-500">
                    <h2>React Component in Laravel</h2>
                </div>
                <div className="card-body"> <p>Today we're counting: {category}</p> </div>
                <div className="card-body"> <p>Mingle data: {message}</p> </div>
            </div>
    )
}

export default HelloWorld
