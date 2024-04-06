import React, {useState, useEffect} from 'react'
import Button from './Button.jsx'

function Counter({wire, ...props}) {

    const [count, setCount] = useState(1)

    const increment = () => {
        wire.doubleIt(count).then((data) => {
            setCount(data)
        })
    }

    const message = props.mingleData.message

    return (
        <div className="m-10">
            <div className="text-lg">
                Counter Component with React
            </div>

            <div className="mt-8">
                Initial message: { message }
            </div>

            <div className="mt-8"></div>

            <div> Let's make the operation on the server, for demo purposes. </div>
            <div className="mt-4 flex gap-4 items-center">
                <Button
                    label="Keep it (reset)"
                    onClick={() => setCount(1)}
                />

                <div> Current Count: { count } </div>

                <Button
                    label="Double it - and give it to the next person"
                    onClick={() => increment(-1)}
                />
            </div>
        </div>
    )
}

export default Counter
