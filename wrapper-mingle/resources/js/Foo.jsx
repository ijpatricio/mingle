import React, { useEffect } from 'react'

function Foo({wire, ...props}) {

        const message = props.mingleData.message

        console.log(message) // 'Message in a bottle 🍾'

        useEffect(() => {
            wire
                .doubleIt(2)
                .then(data => {
                    console.log(data) // 4
                })
        })

    return (
        <div>
            Foo Bar Baz aaa

            {/* <!-- Create something great! --> */}
        </div>
    )
}

export default Foo
