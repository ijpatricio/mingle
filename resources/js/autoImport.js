import fs from 'fs'
import path from 'path'

function findIndexFiles(dir) {
    let results = []

    function traverseDirectory(currentPath) {
        const files = fs.readdirSync(currentPath)

        for (const file of files) {
            const filePath = path.join(currentPath, file)
            const stat = fs.statSync(filePath)

            if (stat.isDirectory()) {
                traverseDirectory(filePath)
            } else if (file === 'index.js') {
                results.push(filePath)
            }
        }
    }

    traverseDirectory(dir)
    return results
}

const findMingles = (rootPath) => {

    const baseDir = path.resolve(process.cwd(), rootPath)

    return findIndexFiles('resources/js')

    let mingles = indexFiles.map(file => {

        console.log(file)

        return ({
            input: path.relative(
                baseDir,
                file.slice(0, file.length - path.extname(file).length)
            ),
            file: file,
        })
    })

    console.log(mingles)
}

export default findMingles
