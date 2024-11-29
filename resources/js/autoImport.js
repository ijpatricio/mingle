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

const findMingles = (rootPath = 'resources/js') => {
    const baseDir = path.resolve(process.cwd(), rootPath)
    return findIndexFiles(baseDir)
}

export default findMingles
